# simulateur de credit

#cloner le projet
  git clone https://github.com/ezekiela0701/simulateurcredit.git

#creer branche develop
  git checkout -b develop

#pull branche develop
  git pull origin develop

#mise en place de la base de données
  php bin/console doctrine:database:create
  php bin/console d:s:u -f

