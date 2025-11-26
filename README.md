# CodeIgniter 4 Docker LAMP Stack

This is a blank base setup for a CodeIgniter 4 project with Docker LAMP stack (Linux, Apache, MySQL, PHP).

## What's Included

- **PHP 8.2** with Apache
- **MySQL 8.0** database
- **phpMyAdmin** for database management
- **CodeIgniter 4** framework (installed via Composer)

## Prerequisites

- Docker Desktop installed on your machine
- Docker Compose

## Project Structure

```
codeigniter_project/
├── app/                    # CodeIgniter 4 application files (created after setup)
├── docker/
│   └── apache/
│       └── 000-default.conf  # Apache virtual host configuration
├── docker-compose.yml      # Docker services configuration
├── Dockerfile             # PHP/Apache container definition
└── README.md             # This file
```

## Quick Start

### 1. Install CodeIgniter 4

First, you need to install CodeIgniter 4 using Composer. Run this command in the project root:

```bash
cd app
composer install
cd ..
```

This will download CodeIgniter 4 and all its dependencies into the `app/vendor` directory.

### 2. Set Up Environment File

Copy the environment file template:

```bash
cd app
cp env .env
cd ..
```

The `.env` file is already configured to work with the Docker MySQL container:

- Database Host: `db`
- Database Name: `codeigniter`
- Database User: `ci_user`
- Database Password: `ci_password`

### 3. Build and Start Docker Containers

Build and start the Docker containers:

```bash
docker-compose up -d --build
```

This command will:

- Build the PHP/Apache container
- Start MySQL container
- Start phpMyAdmin container
- Create a network for the containers to communicate

### 4. Access Your Application

Once the containers are running, you can access:

- **CodeIgniter Application**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
  - Server: `db`
  - Username: `ci_user`
  - Password: `ci_password`
  - Or use root: `root` / `root`

## Docker Commands

### Start containers

```bash
docker-compose up -d
```

### Stop containers

```bash
docker-compose down
```

### View logs

```bash
docker-compose logs -f
```

### Access web container bash

```bash
docker exec -it codeigniter_web bash
```

### Access MySQL container

```bash
docker exec -it codeigniter_mysql mysql -u ci_user -p
```

Password: `ci_password`

### Rebuild containers

```bash
docker-compose up -d --build
```

## Database Configuration

The MySQL container is configured with:

- **Root Password**: `root`
- **Database**: `codeigniter`
- **User**: `ci_user`
- **Password**: `ci_password`
- **Port**: `3306` (accessible from host machine)

## Directory Permissions

The `app/writable` directory needs to be writable by the web server. After installing CodeIgniter, ensure proper permissions:

```bash
docker exec -it codeigniter_web bash
chmod -R 755 /var/www/html/writable
chown -R www-data:www-data /var/www/html/writable
```

## Next Steps

Your CodeIgniter 4 base is ready! You can now:

1. Start developing your application in the `app/` directory
2. Create controllers in `app/app/Controllers/`
3. Create models in `app/app/Models/`
4. Create views in `app/app/Views/`
5. Configure routes in `app/app/Config/Routes.php`

## Troubleshooting

### Port Already in Use

If ports 8080, 8081, or 3306 are already in use, you can change them in `docker-compose.yml`.

### Permission Issues

If you encounter permission issues, run:

```bash
docker exec -it codeigniter_web chown -R www-data:www-data /var/www/html
```

### Database Connection Issues

Make sure to use `db` as the hostname (not `localhost`) in your database configuration since that's the service name in Docker.

## License

This is a starter template. CodeIgniter 4 is licensed under the MIT License.
