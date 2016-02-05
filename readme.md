<center><img src="resources/assets/images/logo.png" width="250"/></center>

A Search Engine For Students
----------------------------
TLDR is an Internet acronym for "too long, didn't read". It is this acronym that powers the TLDR (stylized tl;dr) search engine, which allows students to upload and search an endless stream of course notes, reading notes, practice exams, and more for no charge. Think of it as an entire world of summarized information. Sound cool? Keep reading, my friend.

### Running TLDR
Getting up and running with TLDR is ridiculously simple. Just `cd` into the source directory and run:

    make

One word. See? Simple. Of course, if you want to do a little more than just run everything at once, here's a nice table of what you can do with the `make` command:

| Command             | Description                                               |
|---------------------|-----------------------------------------------------------|
| `make assets`       | Builds *all* CSS and JavaScript                           |
| `make clean`        | Removes the database file, as well as all compiled JS/CSS |
| `make css`          | Compiles (custom) SASS                                    |
| `make dependencies` | Installs all Node and Laravel dependencies                |
| `make js`           | Compiles Javascript using r.js                            |
| `make serve`        | Runs the Laravel server at localhost:8000                 |
| `make semantic`     | Rebuild Semantic UI                                       |
| `make static`       | Builds (custom) CSS and JS                                |

And, of course, to visit TLDR just visit:

    http://localhost:8000

in your browser.
