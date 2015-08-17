# FMS_KSD
###Franklin M. Siler     <me@franksiler.com>

project developed as a code demonstration; released under MIT or BSD 3-clause license

# Requirements as provided in "Instructions" document
### KSD [Code Exercise Instructions](KSD Code Exercise.v2.pdf)
The following is the code exercise that we give our candidates.
The objective here is to understand your process and not necessarily to create a full-fledged working system.
You can build your solution using any web-based technologies you wish as long as it uses a relational database on its backend (MySQL, Sqlite, Postgres, etc) and HTML, CSS, and Javascript on its frontend.
A modern PHP framework would be preferred (Symphony, Laravel, CodeIgniter, etc), but ultimately the idea is to help us evaluate how you go about solving problems in a short amount of time and to give us a sense of how you organize, build, test, document, etc.
Use something you're comfortable with.

There is no time-limit on the exercise; you can spend as much or as little time on it as you wish. We realize we're all extremely busy, so we don't want to have you spend too much time on this. If time is a constraint, you can lay out the framework to the components so that we get a sense of how you would approach the problem and solve it, with basic functionality in place. Please also keep track of your hours. Generally a basic application like this should be possible to build in about a day using existing frameworks and open-source libraries, but obviously that's subjective. We would like to avoid you spending multiple days on this, so if this takes much longer please let us know how far you got.

Your solution (both front and back-end code) must be committed to a github account - please do not restrict it in any way. Send us the github URL for the project once you have the code up to a good enough point that you want us to look at it, and also send a working URL. The application may be hosted on any target of your choice: your own web server, Google App Engine, Heroku, or whatever else you're comfortable with or want to play with and learn. Most services offer a free tier.

Any ambiguity or questions you may come across when building this is up for you to decide how your application behaves. Accounting on your own for inconsistencies in a specification given to you will be important in this position.

While the exercise may seem overly long, we want to reiterate that it's about how you think about the problem scope rather than wasting your time building a full-fledged application. Keep it simple; it doesn't need to be perfect.

### Exercise Description
The objective is to create a simple database-driven web application for keeping track of inventory.

1. Each item in the inventory will have a name, a serial number, a type, the room it is located in, the city it is located in, and the date it was added. For example:

  - Name: John's Desktop Computer
  - Serial Number: 238-1338-22
  - Type: Desktop
  - Room: 251
  - City: Kansas City
  - Date: 2015-05-01

	The name, serial number, and room are arbitrarily given by the user of the application when adding or updating entries (they can be anything). The type and city should be selected from a list of available options. For example:
Types: Desktop, Laptop, Television, and DVD Player Cities: Kansas City, Topeka, and Wichita
The date should be automatically assigned by the application when the entry is added.

2. The application should provide ways of adding, updating, or removing entries from the inventory.

3. The main page of the application should provide a means of viewing all items currently in the inventory, along with ways to filter or trim the list down to find desired entries. What filters are available or the flexibility given to the user for this ability is left up to you. Do what you think is the most user friendly and most helpful. Try to anticipate what a user may want to find, and build your application so that finding it is as seamless as possible.

There is no need for a login or permissions system, etc. Concentrate on the 3 tasks above. The application does not need to be perfect.
### Front End
The design of the user interface is left up to you.
Feel free to use any Javascript or CSS libraries/frameworks you like (such as Bootstrap or Foundation).
It does not need to be perfect or necessarily pretty.
Functionality, intuitiveness, and usability are much more important.
### Back End
As mentioned, please use a modern web framework (PHP preferred) of your choosing along with a relational database you feel comfortable working with (MySQL preferred).
You can write the SQL queries yourself, or use model-based abstractions from an ORM you like.


# Design, Approach, Tooling
1. I used Composer/Packagist for dependency management; the essence here is to be able to easily update underlying software as bugfixes and security patches are released.
1. component-installer 
1. The app itself is built on Laravel on top of SQLite for ease of portability.
This way, I can easily work offline on a laptop (a frequent occurrence) and use version control to easily update live code.
However, I did create proper migrations for these, so they [should also work in MySQL, Postgres, and SQL Server](http://laravel.com/docs/5.1/database#introduction).
1. I used Mercurial for dVCS while working and then converted to git for publication on github.
1. Absent a list of browser requirements, I chose HTML5, Bootstrap, and jQuery as starting points.
1. I chose to document the requirements and my commentary in Markdown.
There are also some code comments where they might be relevant to later bugfixes and improvements.
1. I made an affirmative decision to spend more time learning the framework and available abstractions than coding manually.
2. I did, however, simply run out of time for a few things that would have been nice.  There wasn't time to delve into the ORM features, though they look nice: for example, it would have been easily possible to add an "undelete" feature if the stack was resting on the ORM instead of more directly on the database.
1. Some of the criteria concerned me; for example, allowing a serial number to be "anything" could result in someone putting an entire Kafka novel in the field.  Since the requirement seems explicit that there is no length limit, I used a text field in the database but noted that I should probably limit the displayed length in the browser.  A better solution would be to have the overage display on mouseover.
1. I built the app and this document both on my Dreamhost shared hosting account and on my Macbook Pro running OS 10.9.5.  There are many merges in version control resulting from my deliberate alternating between machines to ensure that features would work "across the board".
2. I'm writing in active voice.  Scientists tend to use passive voice for lab reports, but I don't like the implication that coding fairies came in and did the work here.

## Testing
- [W3C Validator](https://validator.w3.org/nu/?doc=http%3A%2F%2Ffranksiler.com%2Fksd%2Fpublic%2F)
- Database seeding included strings that shouldn't be in the database and strings designed to test the HTML escaping.
- Manual form entry to test escaping of ampersands, carets, etc.  Although the exercise says not to worry about security, input sanitation is an essential and integral part of web dev.
- Selenium (future)

## Time spent
Firstly, it should be noted that I haven't built a PHP app in several years- and what I wrote when I was an undergrad was not all that wonderful.
However, I'm a reasonably quick study.
I hope that this writing demonstrates some learned habits of documentation for myself, if not others.

I spent much time up front wrangling with which frameworks to use.  In the process of building the [legal match engine](https://bitbucket.org/peopleconnector/peopleconnector/overview), I went through about four different WordPress plugins before deciding that I would be better off starting from scratch and learning a new platform.

I also spent a lot of time in the "think tank" deciding that I wanted, if possible:

* unified search implemented in the page rather than hitting the db
* quick and easy row updates, but with some protection against accidental deletion
* no need for pagination, at least early on; but this should be easily added later
* I assumed that all values are required (e.g., "NOT NULL").  It wouldn't do much good to put equipment in the system without a room number, for example.  This assumption is easily changed, of course.
* ideally, use identical, reusable components for the location and items tables frontends so that both could be edited easily.  Notably, the "locations" table has a cascade problem on delete: what should you do with any items assigned to a location which will go missing?  Ideally, you would offer to consolidate them with another location.

Finally, I spent quite a lot of time writing this file, and I committed that I would at least keep track of "gotchas" as I discovered them so that I could submit patches or at least bug reports if I had time.

Once settling on Laravel, actually doing the db schema and writing HTML went smoothly- I wanted to get a functional prototype and then add some niceties.

Finally, of course- development doesn't happen in a vacuum.  It happens with the benefit of a lot of tooling and searching and documentation, and I'm grateful that I took the time up-front to find frameworks that are well-built and reasonably documented.  I did, however, find some non-critical but annoying bugs in my dependency chain.

## Found Bugs

* `artisan`, the script for managing Laravel, will allow one to set a namespace to something which will break the code.
I discovered this by performing `artisan app:name "KSD Frank Siler"`; this broke the tree in a way that would not be easily reversible; fortunately I did `hg revert --all` and got back a clean tree.
It would be appropriate to add a syntax check to `artisan app:name` so that this cannot occur.
*  `artisan make:migration` doesn't seem to correctly handle multiple ``--create`` flags.
*  `artisan` has many options but no autocorrect/suggest feature.
*  `artisan` won't operate properly outside the root directory of a project- not sure if this is deliberate or a bug.
*  Laravel leaves foreign key constraints off for SQLite by default.  I consider this a serious data integrity bug; I've hand-patched the SQLite connector with code from [https://laracasts.com/discuss/channels/general-discussion/l5-sqlite-foreign-key-support](https://laracasts.com/discuss/channels/general-discussion/l5-sqlite-foreign-key-support).  Will probably file bug report.
*  **PR SENT** Eloquent Tables did not properly escape on output.

## Dead Ends
- Larasset is a neat idea but requires more tooling than I had time to deal with in the short run.  I think component-installer is ultimately better for this application.
- Composer itself is no good for directly managing assets; however, indirectly using `bower` through the `fxp/composer-asset-plugin` package seems to manage frontend plugins reasonably well.
- [Datatables Editor](https://editor.datatables.net/) could be very compelling- in fact, it could negate most of the work done on the project.  However, it's not free and the licensing agreement has a choice of laws of Scotland.  So I'm using datatables only for search and hand-rolled the table edit functions.
- [laravel-datatables](https://github.com/yajra/laravel-datatables) could be very powerful but was an extra layer of "yak shaving" that was beyond the scope of the problem here.

## Dev references
- [Notes on getting column names](http://stackoverflow.com/questions/19951787/laravel-4-get-column-names)
- [Composer Namespaces](https://jtreminio.com/2012/10/composer-namespaces-in-5-minutes/)
- [Datatables search](https://datatables.net/examples/api/multi_filter.html)

## Below this is boilerplate from Laravel's `readme.md`
### Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

#### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

#### Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

#### Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

#### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
