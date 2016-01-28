define([
    'jquery',
    'underscore',
    'backbone',
    'text!data/courses.json',
    'text!data/professors.json',
    'text!templates/upload_progress.html',
    'semantic'
], function($, _, Backbone, coursesJSON, professorsJSON, UploadProgressTpl) {

    var SubmitModel = Backbone.Model.extend({

        defaults: {
            uploading: false,
            response: 0
        }

    });

    return SubmitView = Backbone.View.extend({

        el: "#submit",

        events: {

            'click #uploadBtn': function() {
                $('#uploadInput').click();
            },

            'click #continueBtn': function () {
                $('#submitForm').submit();
            },

            'change #uploadInput': 'ajaxUpload'

        },

        initialize: function(args) {

            this.model = new SubmitModel();

            this.availableCourses = _.sortBy(eval(coursesJSON), function(course) {
                return course;
            });

            this.availableProfessors = _.sortBy(eval(professorsJSON), function(professor) {
                return professor;
            });

            this.listenTo(this.model, 'change', this.render);

        },

        populateDropdown: function(array, id, placeholder) {
            $('#' + id).append($('<option value="">').html(placeholder));
            _.each(array, function(value, key, list) {
                $('#' + id).append($('<option>').html(value));
            });
        },

        enableBtn: function(id) {
            this.$el.find('#' + id).prop('disabled', false).removeClass('disabled');
            this.delegateEvents();
            this.$el.find(':disabled').each(function() {
                this.click(function() {});
            });
        },

        disableBtn: function(id) {
            this.$el.find('#' + id).prop('disabled', true).addClass('disabled').click(function() {});
        },


        ajaxUpload: function() {

            var file_data = $('#uploadInput').prop('files')[0],
                form_data = new FormData(),
                token = $('meta[name="csrf-token"]').attr('content'),
                self = this;

            this.model.set({
                uploading: true,
                response: 0
            });

            this.$el.find('#errorLabel').remove();

            form_data.append('pdf', file_data);
            form_data.append('_token', token);

            $.ajax({
                url: '/submit/upload/',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) {
                        myXhr.upload.addEventListener('progress', function(evt) {
                            if (evt.lengthComputable) {
                                self.$el.find('#uploadProgress').progress({
                                    percent: Math.floor((evt.loaded / evt.total) * 100)
                                });
                            } else {
                                console.log('Unable to display progress bar');
                            }
                        }, false);
                    }
                    return myXhr;
                },
                data: form_data,
                type: 'post',
                success: function(response) {
                    self.model.set({
                        uploading: false
                    });
                    self.model.set({
                        response: response
                    });
                }
            });

        },

        pushError: function(error_code) {

            var
                $error_label = $('<h4>').addClass('ui red centered header').attr('id', 'errorLabel'),
                error_code = parseInt(error_code),
                error_text;

            switch (error_code) {
                case 415:
                    error_text = 'File type is invalid.';
                    break;
                default:
                    error_text = 'An error occured.'
                    break;
            }

            this.$el.find('#uploadProgress').removeClass('success').addClass('error');
            this.$el.find('#uploadArea').append($error_label.html(error_text).fadeIn(500));
        },

        render: function() {

            var uploadProgress = $('<div/>').html(_.template(UploadProgressTpl)).contents(),
                response = parseInt(this.model.get('response'));

            this.populateDropdown(this.availableCourses, 'coursesDropdown', 'Which course did you take these notes for?');
            this.populateDropdown(this.availableProfessors, 'professorsDropdown', 'Which professor did you take these notes for?');

            this.disableBtn('continueBtn');

            $('#coursesDropdown').dropdown();
            $('#professorsDropdown').dropdown();

            if (this.model.get('uploading')) {
                this.$el.find('#uploadProgress').remove();
                this.$el.find('.segment').append(uploadProgress);
                this.$el.find('#uploadProgress').progress({
                    percent: 0
                });
            } else if (response == 200) {
                this.disableBtn('uploadBtn');
                this.enableBtn('continueBtn');
            } else if (response > 0) {
                this.enableBtn('uploadBtn');
                this.pushError(response);
            }

            this.$el.find('.ui.form')
                .form({
                    fields: {
                        title: 'empty',
                        description: 'empty'
                    },
                    inline : true,
                    on: 'blur'
                });
        }

    });

});
