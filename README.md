# E-SIWES

The Student Industrial Work Experience Record System\
Version 1 - MySQL\
Version 2 - MySQLi

## Table of Contents

* [About](#e-siwes)
* [Technologies Used](#technologies-used)
* [Author](#author)

## Technologies Used

* [PHP5](https://php5-tutorial.com/) HyperText Preprocessor
* [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML) Hypertext MarkUp Language
* [CSS](https://www.w3schools.com/css/) Cascading Stylesheet
* [CKEditor](https://ckeditor.com/) is a WYSIWYG rich text editor which enables writing content directly inside of web pages or online applications.
* [fpdf](http://www.fpdf.org/) is a PHP class which allows to generate PDF files with pure PHP, that is to say without using the PDFlib library.

## Installations

### Getting started

* Install either WAMP/XAMPP/MAMP

### Clone

* Clone this project to your local machine `https://github.com/allebd/esiwes.git`
  > Run the command below

```shell
   git clone https://github.com/allebd/esiwes.git
```

### Setup

* Installing the project dependencies
  > Copy your the cloned project to htdocs/www directory, whether you using XAMPP/WAMP respectively.

* Create your database
  > Creation of a database following this db diagram below, create a database with the name "esiwes"

```shell
  https://dbdiagram.io/d/5de57591edf08a25543e9ea6
```

* Import database table
  > Import the file "esiwes.sql" into the created esiwes database

* Creation of a new student
  > Go to the "reglist" table in your "esiwes" database insert a record e.g.\
  matno = '150523' (To serve as the student's username)\
  fno = '150523' (To serve as the student's password)\
  fname = 'James'\
  sname = 'Bond'\
  sex = 'Male'\
  yog = '2023'\
  level = '300'\
  program = 'Computer Science'

* Creation of a new admin/supervisors
  > Go to the "stafflist" table in your "esiwes" database insert a record e.g.\
  staffId = '50001' (To serve as the supervisor's username)\
  fname = 'Tunji'\
  sname = 'James' (To serve as the supervisor's password)\
  sex = 'Male'

* Start your apache server then
  > Run the command below

```shell
  http://localhost/{VERSION_NUMBER}/{PROJECT_DIRECTORY}/
```

* To access student page
  > Run the command below

```shell
  http://localhost/{VERSION_NUMBER}/{PROJECT_DIRECTORY}/index.php
```

* To access admin page
  > Run the command below

```shell
  http://localhost/{VERSION_NUMBER}/{PROJECT_DIRECTORY}/siwesadmin.php
```

## Author

[Bella Oyedele](https://github.com/allebd)