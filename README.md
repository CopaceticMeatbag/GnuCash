# Pretty GnuCash

[GnuCash](http://www.gnucash.org/) is an open source double-entry accounting system, which just happens to be ugly as hell.
This is a project designed to change that.

## Getting Started

To use this website:

* Install PHP & PostgreSQL
* Setup your favourite web server (Apache, IIS, etc)
* Clone the repo into the web server's default directory: `git clone https://github.com/CopaceticMeatbag/GnuCash.git`
* Save your GnuCash data in PostgreSQL

### Docker

Development environment, with the src directory mapped to the web server container.
Web server exposed on localhost:80 and database on localhost:5432.

    docker-compose up

Production web server image build from project root directory, will copy src into image.

    docker build -f docker/prod/Dockerfile .

## Bugs and Issues

There are currently quite a few bugs and missing features, these will be fixed and added over the next few weeks.
In the interim, please feel free to offer feedback or make any suggestions you wish!

## Creator

*[Mike Anthony](https://github.com/CopaceticMeatbag)

## Copyright and License

This project makes heavy use of "Start Bootstrap" by **[David Miller](http://davidmiller.io/)**
All other code may be copied/used as you wish with respect to any licences parts of the project may be under.