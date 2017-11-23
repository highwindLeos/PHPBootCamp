SELECT follows.id AS Fid, follow, follower, users_id, users.id AS Uid, users.name, users.author, us.usericon  FROM 
follows JOIN users ON follows.follow = users.id 
JOIN users as us ON follows.follower = us.author
WHERE users.author = 'Leodays'
ORDER BY Fid DESC;