<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://laravel.com">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Logo" width="400" height="80">
  </a>

  <h3 align="center">Contact request example</h3>

  <p align="center">
    <!-- <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a>
    · -->
    <a href="https://github.com/Whallas/netshowme-test-contact-us-page/issues">Report Bug</a>
    ·
    <a href="https://github.com/Whallas/netshowme-test-contact-us-page/issues">Request Feature</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#mailing">Mailing</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#testing">Testing</a></li>
    <li>
        <a href="#code-overview">Code overview</a>
        <ul>
          <li><a href="#other-dependencies">Other dependencies</a></li>
          <li><a href="#folders">Folders</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Product Name Screen Shot][product-screenshot]](https://github.com/Whallas/netshowme-test-contact-us-page/blob/main/resources/img/screenshot.png)

Laravel test project designed for contracting stage and portfolio. Example of a system with "contact us" function. Every contact request is sended as an email notification to the administrator, this email contains all the form data and the document attached by the user.

### Built With

This project was built using the basics of Laravel 8 and Bootstrap 4.5 frameworks.

-   [Bootstrap 4.5](https://getbootstrap.com/docs/4.5/getting-started/introduction/)
-   [Laravel 8](https://laravel.com/docs/8.x)

<!-- GETTING STARTED -->

## Getting Started

It's easy to get started with Laravel, Laravel 8 provides [Sail](https://laravel.com/docs/8.x/sail), a built-in solution for running Laravel projects using [Docker](https://www.docker.com/).

### Prerequisites

First of all you need to have [docker](https://docs.docker.com/engine/install/) and [composer](https://getcomposer.org/download/) installed on your machine. After that follow the steps below.

### Installation

-   Clone the repository
    ```sh
    git clone git@github.com:Whallas/netshowme-test-contact-us-page.git
    ```
-   Switch to the repo folder
    ```sh
    cd netshowme-test-contact-us-page
    ```
-   Install composer dependencies
    ```sh
    composer install
    ```
-   Copy the example env file and make the required configuration changes in the .env file
    ```sh
    composer run post-root-package-install && composer run post-create-project-cmd
    ```

If you want you can change some environment variables that are used in docker-compose.yml (like ports, for example) before the next step.

-   Start Sail (**don't use bash alias here!**).
    ```sh
    ./vendor/bin/sail up -d
    ```
-   Run the database migrations and seeders
    ```sh
    ./vendor/bin/sail artisan migrate --seed
    ```
-   Install node dependencies and run all [Laravel Mix](https://laravel.com/docs/8.x/mix) tasks
    ```sh
    ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
    ```

### Mailing

You must configure your test email client on .env file to use email sending features.

I recomment to use the Mailtrap.io for tests ([link](https://help.mailtrap.io/article/5-smtp-integration) to documentation). You will configure the following variables:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=... # your unique username
MAIL_PASSWORD=... # your unique password
MAIL_ENCRYPTION=tls
```

The administrative email used by system is configured in the following variable:

```
MAIL_FROM_ADDRESS=test@mail.com
```

<!-- USAGE EXAMPLES -->

## Usage

You must run the queue to listen to the new processes:

```
./vendor/bin/sail artisan queue:work
```

The page can be accessed at http://localhost:8080/contact_us.

After the form is submitted, a notification email will be sent to the system administrative email. Queue is used to queue this process in the background.


## Testing

Run the PHPUnit tests
```sh
./vendor/bin/sail test
```

---

# Code overview

## Other dependencies

-   [Animate.css](https://daneden.github.io/animate.css)
-   [Font Awesome](https://fontawesome.com)
-   [WOW.js](https://wowjs.uk/)
-   [IMask.js](https://imask.js.org/)
-   [SwiftMailer](https://swiftmailer.symfony.com/)
-   [Guzzle HTTP](https://docs.guzzlephp.org/en/stable)
-   [PHPUnit](https://phpunit.de/)
-   [Mockery](http://docs.mockery.io/en/latest/)

## Folders

-   `app/Models` - Contains all the Eloquent models
-   `app/Models/Contracts` - Contains all the model interfaces
-   `app/Http/Controllers` - Contains all the controllers
-   `app/Http/Requests` - Contains all the form requests
-   `app/Mail` - Contains all the mailable classes
-   `app/DataTransferObjects` - Contains all the DTO's
-   `config` - Contains all the application configuration files
-   `database/factories` - Contains the model factory for all the models
-   `database/migrations` - Contains all the database migrations
-   `database/seeds` - Contains the database seeder
-   `routes` - Contains all the routes defined in web.php file
-   `tests` - Contains all the unit and integration tests
-   `reources` - Contains all the system resources, including language, styles, images, scripts and views.

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/amazing-feature`)
3. Commit your Changes (`git commit -m 'Add some amazing-feature'`)
4. Push to the Branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->

## Contact

Whallas Pimentel - whallaspimnmetel@gmail.com

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/Whallas/netshowme-test-contact-us-page?style=for-the-badge
[contributors-url]: https://github.com/Whallas/netshowme-test-contact-us-page/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/Whallas/netshowme-test-contact-us-page.svg?style=for-the-badge
[forks-url]: https://github.com/Whallas/netshowme-test-contact-us-page/network/members
[stars-shield]: https://img.shields.io/github/stars/Whallas/netshowme-test-contact-us-page.svg?style=for-the-badge
[stars-url]: https://github.com/Whallas/netshowme-test-contact-us-page/stargazers
[issues-shield]: https://img.shields.io/github/issues/Whallas/netshowme-test-contact-us-page.svg?style=for-the-badge
[issues-url]: https://github.com/Whallas/netshowme-test-contact-us-page/issues
[license-shield]: https://img.shields.io/github/license/Whallas/netshowme-test-contact-us-page.svg?style=for-the-badge
[license-url]: https://github.com/Whallas/netshowme-test-contact-us-page/blob/main/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/whallas-pimentel-bezerra
[product-screenshot]: resources/img/screenshot.png
