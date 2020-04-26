# SYMFONY BOOTSTRAP

This project run a simple and empty  `symfony-web-skeleton` project thanks to docker and docker-compose.
This project contains :

- PHP `7.4.5`
- Symfony `4.4`

## Prerequisites

In order to run this project, you'll need to have installed on your environment:

- [Docker](https://docs.docker.com/)
- [docker-compose](https://docs.docker.com/compose/)

With the common configuration, make sure nothing is running on the following ports:

- 8000

If you cannot empty one of these ports, think about creating a [docker-compose.override.yaml](https://docs.docker.com/compose/extends/) file.

## Usage

### Start

To start the project, simply run: 

```bash
docker-compose up -d
```

Then it will be accessible through `localhost:8000`.

### Stop

To stop, run:

```bash
docker-compose down
```

## Testing

Testing using PHPUnit:

```bash
docker-compose run php bin/phpunit
```