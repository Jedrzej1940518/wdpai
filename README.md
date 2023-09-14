Versus

A simple web application that allows users to track their favorite pro players when they play against each other.
It allows each user to have his own "pro player list". Pros in this list will have their matches tracked versus each other.

Setting up:
docker-compose build && docker-compose up -d

By default, it's hosted on localhost:8080

Views:

http://localhost:8080/versus

http://localhost:8080/login

http://localhost:8080/register

http://localhost:8080/trackedPros

Api:

http://localhost:8080/api/pros

http://localhost:8080/api/matches/{pro_id}
