seeders = UserSeed, RoleSeeder
migrations =  create_users_table, create_roles_seeder

views = user map -> index.blade, create.blade etc

web.php =     Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');

rsources gebruiken

flow stappen

create migration,seed, routes, model, resource, controller, blade

tables

client tables

users = id, role. password, account_status
clients = user_id, name, surname, street, street_nr, zipcode, phone_number, city
reportResults = client_id, question_scores, questions, filled_at
activityResults = client_id, day_data, date_today
activityValues = client_id, main_activities, scaled_activities
reportQuestions = client_id, questions

client controllers

UserController -> User -> UserResource

create, read, update, delete, show, edit , index

user can create, read, update, show and edit User stuff.



