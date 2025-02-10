:: Set current directory
set CURRENT_DIR=%~dp0
set ROOT_DIR=%CURRENT_DIR%..\..
set CONFIG_DIR=%CURRENT_DIR%..\..\config\propel
set DB_NAME=default
set NAMESPACE=App\Propel\

:: Remove old propel so that we can have a clean setup
rmdir /Q /S %ROOT_DIR%\app\Propel\

:: Create database schema
echo Create database schema
call %ROOT_DIR%\vendor\bin\propel database:reverse --config-dir=%CONFIG_DIR%\ --output-dir=%CONFIG_DIR% --database-name=%DB_NAME% --schema-name=schema_auto

:: Add database namespace for generated classes
echo Add database namespace for generated classes
php %CURRENT_DIR%replace_in_file.php "<database name=\"%DB_NAME%\" defaultIdMethod=\"native\" defaultPhpNamingMethod=\"underscore\">" "<database name=\"%DB_NAME%\" defaultIdMethod=\"native\" defaultPhpNamingMethod=\"underscore\" namespace=\"%NAMESPACE%">" "%CONFIG_DIR%\schema_auto.xml"

:: Move file with the new name
echo Move file with the new name
move %CONFIG_DIR%\schema_auto.xml %CONFIG_DIR%\schema.xml

:: Create all model classes
echo Create all model classes
call %ROOT_DIR%\vendor\bin\propel model:build --config-dir=%CONFIG_DIR%\ --output-dir=%ROOT_DIR%\ --schema-dir=%CONFIG_DIR%\
echo Model classes generated

:: Add files to git
echo Add files to git
git add %ROOT_DIR%\app\Propel\
echo Files added to git
