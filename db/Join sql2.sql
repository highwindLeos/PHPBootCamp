SELECT articles.id AS Aid, article, date, articles.users_id, comments.id AS Cid, comments.comment, comments.articles_id 
FROM anicoboard.articles LEFT JOIN anicoboard.comments 
ON articles.id = comments.articles_id;