<p align="center">
  <a href="https://www.lanonnarose.com" target="_blank">
    <img src="https://github.com/DiegoPevi05/lanonnarose-server/blob/main/public/logo.png" width="200">
  </a>
</p>

# La Nonna Rose Backend

This Backend application is developed to connect with the Front-End Web [la nonna rose](https://www.lanonnarose.com).
This application is developed to control incoming request that comes from the Front-End to send emails to the contact form submit that are done in the webpage, also manage the content of the web :

## Features

- **Contact Form:** The application provide the api route to handle request for email contact .


## Dependencies and Libraries

This project relies on the following key dependencies and libraries:

- [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle)
- [boostrap](https://getbootstrap.com/)

## Installation and Setup

To install the project on your local machine, you can follow these steps:

1. Clone this repository to your local directory.
2. Install project dependencies using the following command:
```
composer install
```
3. If you have limited server resources, consider installing dependencies locally and exporting the vendor folder using the following command:
```
composer dump-autoload
