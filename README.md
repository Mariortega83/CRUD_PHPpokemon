# PokeApp

Con esta App podrás insertar, consultar y eliminar pokemons en una base de datos

## Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/tu-usuario/CRUD_PHPpokemon.git
    ```

2. Navega al directorio del proyecto:
    ```bash
    cd CRUD_PHPpokemon
    ```

3. Instala las dependencias de Composer:
    ```bash
    composer install
    ```

4. Copia el archivo `.env.example` a `.env` y configura tu base de datos y otras variables de entorno:
    ```bash
    cp .env.example .env
    ```

5. Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

6. Ejecuta las migraciones de la base de datos:
    ```bash
    php artisan migrate
    ```

7. Inicia el servidor de desarrollo:
    ```bash
    php artisan serve
    ```

## Diseño interfaz
Aquí observamos el inicio
![alt text](inicio.png)

Aquí podemos encontrar la interfaz de la app donde veremos los pokemon listados y solo podemos editar o borrar si estamos logeados.
![alt text](ver.png)

Aquí el formulario de edición.
![alt text](edit.png)

Aquí el formulario para añadir
![alt text](add.png)

Aquí podemos ver como elimina
![alt text](delete.png)

Aquí observamos como visualizar los datos mediante el view
![alt text](view.png)


