SELECT comments.id, comment, users_id, articles_id, users.id, author FROM comments JOIN users ON comments.users_id = users.id;