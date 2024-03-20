
# How to run
cp env.example .env
# edit .env
docker-compose up -d  

# Check running docker instance
docker ps ==> should list church_db, church_phpmyadmin, church_admin  

# Import database
## go to 
phpmyadmin => http://localhost:[PHPMYADMIN_PORT | 7771]  

## import sql file to phpmyadmin
contact Yves B. to get the .sql file  

# Web platform
Web interface => http://localhost:[ADMIN_PORT | 8300]  

## Clean app views/route/cache
docker exec -it church_admin bash  
php artisan route:clear  
php artisan view:clear  
php artisan cache:clear  
