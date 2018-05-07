# faq

To run the FAQ project:

1. git clone https://github.com/sonyahidar/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. run: php artisan key:generate
5. setup database / with sqlite or other https://laravel.com/docs/5.6/database
6. Run: php artisan migrate
7. Run: unit tests: phpunit
8. Run: seeds php artisan migrate:refresh --seed

Epic:
Develop a tagging system that allows a user to attach multiple tags to a question.

User Stories:
- User can add tags to questions when creating a new, or editing an existing question, by selecting the "Manage Tags" option and then selecting "Add Tag".
-    User can delete tags from a question when creating a new, or editing an existing question, by selecting the "Manage Tags" option and then selecting "Delete Tag".
- User can edit existing tags when creating a new, or editing an existing question, by selecting the "Manage Tags" option and then selecting "Edit Tags".
- User can view existing tags attached to a question on the homepage, view of a question, or through the "Manage Tags" option available when question is being edited.

Use the following credentials for app hosted on 
http://faqsonyahidar.herokuapp.com/home: 

username: testuser@njit.edu

password:s****t
