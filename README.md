## Gestión de Pokemons con Laravel en entorno dockerizado

**Descripción:**

Este proyecto te permite gestionar una colección de Pokémon, incluyendo sus datos y objetos equipados.

**Funcionalidades:**

* **Listado de Pokémon:** Visualiza una lista de todos tus Pokémon con información básica como nombre, equipo etc.
* **Detalles del Pokémon:** Accede a la información completa de un Pokémon en particular, incluyendo sus objetos equipados.
* **Equipamiento de objetos:** Equipa a Pokémons con bayas o pociones.

**Tecnologías:**

* **Laravel Framework 10.48.3:** 
* **MySQL:** 
* **Docker:** 

**Requisitos:**

* **PHP >= 7.4**
* **Composer**
* **Entorno Docker WSL**

**Cómo empezar:**

1. **Clonar el proyecto:**

   ```bash 
   git clone https://github.com/pabloportillo/areaf5.git
2. **Instalar dependencias:**

   ```bash 
   composer install 
   composer update

3. **Copia el archivo `.env.example` y renómbralo a `.env`**


4. **Configurar entorno de desarrollo por primera vez:**

   ```bash 
   docker-compose build 
5. **Levantar el proyecto:**

   ```bash 
   ./vendor/bin/sail up
6. **Configurar la base de datos ejecutando las migraciones:**

   ```bash 
   ./vendor/bin/sail artisan migrate
7. **Lanzar los seeders de Usuarios y Pokemons:**

      ***¡Importante!:Los seeders crean datos dummy para usuarios y pokemons, teniendo en cuenta que los pokemons que creará no estaran en la pokedex, si no que seran datos aleatorios!. Para distinguir esto he añadido un campo 'dummy' en el listado en el que muestra si el dato representado es aleatorio o no lo es.***

   ```bash 
   ./vendor/bin/sail artisan db:seed
8. **Importar el archivo pokemon.csv (verificar que el archivo se encuentra en storage/pokemon.csv para su correcta importación):**

   ```bash 
   ./vendor/bin/sail artisan import:pokemon-csv
9. **Acceder a la aplicación: Abre tu navegador en la dirección:**

   ```bash 
   http://localhost
## Documentación

1. **Rutas:**

   - **/pokemons**: Lista de Pokémons capturados.
   - **/pokemons/create**: Crear un nuevo Pokémon.
   - **/pokemons/{id}**: Ver detalles de un Pokémon.

2. **Puedes acceder a la base de datos a través de phpMyAdmin en:**
   - **- Usuario: root**: 
   - **- Contraseña: strong_password**:
   ```bash 
   http://localhost:8080/
3. **Como puedes equipar con berry ó potion a un pokemon a través del endpoint:**
      #### Endpoint: 
      /pokemons/{id}/equip

      #### Método: 
      POST

      #### Parámetros:
      - **id:** El identificador del Pokémon al que deseas equipar el objeto.
      - **item_id:** El identificador del objeto que deseas equipar.

      #### Ejemplo de solicitud:
      **JSON:**
      ```json
      {
         "item_type": "berry"
      }
