# Equipe 12 - SAE 2.03
# LEVESQUE Kyliann, LE BRETON Kyllian, MENARD Esteban 

# Définition de l'image de base à savoir Debian

FROM debian:latest

# Mettre à jour les paquets et installer curl, sudo et git puis installer apache, php et l'extension mysqli nécessaire pour l'utilisation de PHP avec MySQL

RUN apt-get update && \
    apt-get install -y curl sudo git apache2 php libapache2-mod-php && \
    apt-get install -y php-mysql

# Lancement de l'application
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
