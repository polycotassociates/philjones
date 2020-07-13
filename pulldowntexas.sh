platform mount:download --mount=web/sites/texas/files --target=web/sites/texas/files -y
platform db:dump --relationship texas -y
drush @drupalvm.alexissanchez sql-drop -y
drush @drupalvm.alexissanchez sql-cli < ogjymcrf4mzra--master-7rqtwti--mysqldb--texasdb--dump.sql
drush @drupalvm.alexissanchez cr
drush @drupalvm.alexissanchez uli
