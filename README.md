# POC (Proof Of Concept) Tchat avec ReactJS + ReactPHP + doctrine 


## Installation

1. Installation docker

    ```bash
    # make
    ```

2. Installation vendor

     1. Connection container 
     ```bash
       $ bash -c "clear && docker exec -it docker_php_1 bash"
      ```

    2. Composer install & create database

    ```bash
        $ composer install
        $ php vendor/bin/doctrine orm:schema-tool:create
        $ php vendor/bin/doctrine orm:schema-tool:update --force
        $ php vendor/bin/doctrine orm:validate-schema
        $ php vendor/bin/doctrine orm:generate-proxies
    ```
    
    3. Run chat server 
    
    ```bash
        $ php Application/Socket/WsServer.php
    ```
3. Enjoy :-)