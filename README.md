# Login Page with PHP, Apache, MySQL, and Docker Compose

This project demonstrates a login page built using PHP, Apache, and MySQL, orchestrated with Docker Compose. The CI/CD automation is implemented using a `Jenkinsfile` for streamlined development, testing, and deployment.

---

## Features

- **User Authentication**: Simple login functionality with user credentials stored in a MySQL database.
- **Dockerized Setup**: PHP, Apache, and MySQL services are containerized using Docker Compose.
- **CI/CD Pipeline**: Jenkinsfile automates the build, testing, and deployment process.
- **Portability**: Easily deploy the entire stack on any Docker-supported environment.

---

## Prerequisites

- **Docker** and **Docker Compose** installed
- **Jenkins** server set up with access to the project repository
- Basic understanding of CI/CD processes

---
### mysql container images requirement --

```
MYSQL_USER: 
MYSQL_PASSWORD:
MYSQL_DATABASE:
```
### Note : if you have mysql backup file then mount it given section 

```
datadb:
    container_name: db
    image: mysql
    volumes:
     - ./sql:/docker-entrypoint-initdb.d/
    restart: always
    environment:
        MYSQL_ROOT_PASSWORD: q1234
        MYSQL_DATABASE: login
        MYSQL_USER: akash
        MYSQL_PASSWORD: q1234
```

### Use logintable with that colume :-
```
mysql> select *from logintable;

+----+-------+----------+

| id | user | password |

+----+-------+----------+

| 1 | akash | q000 |

+----+-------+----------+
```
