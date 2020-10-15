# Dealer Inspire Code Challange

Thanks for taking the time to review my response to your code challange. It was a fun task to work on and I'm happy with the solution that I've developed.

Below you will find a short description of how I solved the challange along with some instructions on running the application locally, if you choose to do so.

Thanks again,

Chris

## The Challange

Please create a contact form in the contact form page of the website template. Your contact form should contain the following required fields:

* Full Name
* Email
* Message

You should also have the following non-required fields:

* Phone

Once valid information is received from the form, two processes should occur.

First, email a copy of the contact request to guy-smiley@example.com

Second, keep a copy of the contact form in a database so that we can review the contact form later. You do not need to provide an interface to access that data (for example, there will be no admin login).

## Expectations

- [x] Your contact form should be in valid HTML in our template. It should match the style of the template.
- [x] Your back-end processing should be done in PHP. You may use a framework, or plain PHP - either is fine.
- [x] Your contact form data should be validated.
- [x] One copy of the data should be emailed to the owner (listed above). You can choose either HTML or plaintext email (or a combination).
- [x] One copy of the data should be kept in a MySQL, MongoDB or Postgres database.
- [x] Some indication that the contact form has been sent should be given.
- [x] You should have PHPUnit-compatible unit tests for your application.
- [x] Provide either a database schema file or a programmatic way of creating your database / tables.
- [x] The completed work is available in a public git repository for us to checkout and review.

## Solution

To solve the code challange I choose to use the Lumen framework and take the approach of building an API which the frontend will communicate asynchronously with. This will allow us to start with a monolith application but decoupled enough where we could easily pull out the frontend code in to a separate SPA wihtout a lot of refactoring.

The app has two routes, a GET `/` to load the default view and assets with the contact form and also a POST `/api/contacts` to accept a contact form submission.

Upon form submission, Lumen's built-in validation will return a JSON response for any missing required fields which the frontend will parse. If the submission is successfull, the contact form's data will be stored in the `contacts` table and an Event called `ContactAdded` will be dispatched which will trigger an Email to `guy-smiley@example.com` along with the recipient and their message.

## Project Setup

There are a couple of different ways of running this solution. The requirements call for using PHP's built-in web server but this method does not include a database instance. As an alternative, included in the repo is a docker compose file that will build a database, web server, and php-fpm container for which you can get the full "Guy Smiley" experience.

### PHP Web Server

_This method assumes you have PHP installed_

From the project root, run the following command.

```
php -S 127.0.0.1:9999 -t ./webapp/public
```

With the web server running you can visit http://127.0.0.1:9999 in your browser.

### Docker Containers

_This method assumes you have Docker installed_

From the project root, run the following commands to build the necessary Docker containers to run the solution.

```
docker network create di-proxy
docker-compose up -d
```

One further command is necessary to get the solution running, that's to add an entry to your hosts file. Assuming a Unix-like OS, run the following command:

```
echo 127.0.0.1 dealerinspire.localhost | sudo tee -a /etc/hosts
```

With the containers running you can visit http://dealerinspire.localhost in your browser.

## Testing

Using the Docker container method you will be able to submit a contact form, see the `contacts` table populated, and also see in `webapp/storage/logs/lumen.log` a copy of the message that will be sent to Guy Smiley.

Automated testing has been simplified to a simple shell command which will run phpunit in the fpm container.

```
./test.sh
```
