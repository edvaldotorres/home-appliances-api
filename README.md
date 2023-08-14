<h1 align="center">Welcome to home-appliances-api 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/php-^8.1-blue.svg?cacheSeconds=2592000" />
  <img alt="Version" src="https://img.shields.io/badge/laravel-^10.10-red.svg?cacheSeconds=2592000" />
  <a href="https://documenter.getpostman.com/view/13040502/UzBjrney#c3212110-5be6-45bd-b000-95c6538746ca" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

> Complete API for managing appliances, offering comprehensive functionalities that include the possibility to create, list, update and remove records in an efficient and organized way. Simplify administration of your home appliances through this powerful programming interface, allowing full control over data and ensuring a seamless management experience.

## Prerequisites

- Docker

## Install

1. Clone your repository, example:

```sh
git clone https://github.com/edvaldotorres/home-appliances-api.git
```

2. Change directory into the newly created app/project.

```sh
cd home-appliances-api
```

3. Run the servers

```sh
sh script-start-docker-compose.sh
```

NOTE: This may take a while if this is the first time installing this as a container.

4. Install the dependencies

```sh
docker exec -it home-appliances-api-php-fpm-1 /bin/bash
```

```sh
cd app
```

```sh
composer intall
```

5. Build the migrate and seed

```sh
php artisan migrate --seed
```

## Usage

1. You can now open your application with platform: http://localhost:8000/api/v1/products

## Author

👤 **Edvaldo Torres de Souza**

- Website: [edvaldotorres.com.br](https://edvaldotorres.com.br/)
- Github: [@edvaldotorres](https://github.com/edvaldotorres)
- LinkedIn: [Edvaldo Torres](https://www.linkedin.com/in/edvaldo-torres-189894150/)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/edvaldotorres/home-appliances-api/issues).

## Show your support

Give a ⭐️ if this project helped you!
