SELECT *, follows.id AS Fid, users.id AS Uid FROM follows JOIN users 
ON follows.follow = users.id ORDER BY Fid DESC;