install:
	cd docker && docker-compose stop && docker-compose up --build -d
build:
	cd docker && docker-compose build
stop:
	cd docker && docker-compose stop