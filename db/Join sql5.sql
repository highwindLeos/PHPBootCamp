SELECT follows.id AS Fid, follow, follower, users_id, users.id AS Uid, users.name, users.author, users.usericon  FROM 
follows JOIN users 
ON follows.follow = users.id 
JOIN users as us
ON follows.follower = us.author
ORDER BY Fid DESC;