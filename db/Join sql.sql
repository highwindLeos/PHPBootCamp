SELECT * FROM anicoboard.pictures LEFT JOIN anicoboard.articles ON pictures.articles_id = articles.id 
LEFT JOIN users AS Us ON articles.users_id = Us.id
WHERE author = 'NaraLee' ORDER BY pictures.id DESC