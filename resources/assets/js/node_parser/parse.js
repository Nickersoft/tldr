var fs = require('fs');

fs.readFile(__dirname + '/original.json', 'utf8', function(err, data) {

    fs.mkdirSync(__dirname + '/../data/');

    var array = eval(data),
        p_array = [],
        c_array = [],
        i = 0;

    for (i = 0; i < array.length; i++) {
        var p = array[i].in;
        if (p_array.indexOf(p) == -1) {
            p_array.push(p);
        }
    }

    for (i = 0; i < array.length; i++) {
        var c = array[i].su + ' ' + array[i].cr;
        if (c_array.indexOf(c) == -1) {
            c_array.push(c);
        }
    }

    fs.writeFile(__dirname + '/../data/professors.json', JSON.stringify(p_array), function(err) {
        if (err) return console.log(err);
        console.log('Wrote array of professors to file');
    });

    fs.writeFile(__dirname + '/../data/courses.json', JSON.stringify(c_array), function(err) {
        if (err) return console.log(err);
        console.log('Wrote array of courses to file');
    });
});
