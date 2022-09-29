# Sauvegarde BDD

    mysqldump --user=admin --password=1234 GesCom > backup_GesCom.sql

# Restauration BDD

    cat backup_GesCom.sql | mysql --user=admin --password=1234 new_GesCom