## Description

Deploying automatically the code with PHP and GitHub.

## On your server

1. The apache user needs read and write access to the folder repository
```
chown -R apache:apache folder_repository/
```

2. Create the folder .ssh for apache with the correct permissions
```
su mkdir /var/www/.ssh
su chown -R apache:apache /var/www/.ssh
```

3. Generate the keys for apache user
```
sudo -u apache ssh-keygen -t rsa
```

4. Add the authentication to the known_hosts file so do not ask to run git clone

```
sudo -u apache ssh -o StrictHostKeyChecking=no git@github.com
```

## On GitHub

1. Add the key (id_rsa.pub) to the repository on github (within the repository->Settings->Deploy keys)

2. Add webhook in the Webhooks & Services.

3. In Payload URL enter: http://mydomain.com/deploy.php?token=mytoken

## Done
The next time you push, you will see the changes automatically on your production server

## License
This project is licensed under the [MIT license] (https://github.com/vicentegarcia/autodeploy-php-github/blob/master/MIT-LICENSE.txt)
