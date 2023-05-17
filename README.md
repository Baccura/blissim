# Installation du projet

Prérequis :
- avoir Docker installer et pouvoir utiliser la commande `docker-compose`
- se positioner dans le dossier du projet

**Docker**

Lancer la commande suivante :
```bash
docker-compose -f ./docker-compose.yml up -d --force-recreate --build
```

**Base de données**

Accéder au docker db :
```bash
docker exec -ti blissim_db_1 mysql -uroot -proot
```
Une fois dans le docker il faut lancer la requête de création de la base de données :
```bash
CREATE DATABASE `blissim`;
```

Il faut insérer les données de tests :
```bash
sudo docker exec -i blissim_db_1 mysql -uroot -proot blissim < www/db.sql 
```

**Site**

Accéder au docker web :
```bash
sudo docker exec -i blissim_web_1 bash
```

On lance composer :
```bash
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer | composer install
```

**Tester**

Le lien pour accéder au projet : http://0.0.0.0:88/

Les utilisateurs pour la création des commentaires :
- blissim@test.com : blissim
- test@blissim.com : blissim
