SELECT *, follows.id AS Fid, users.id AS Uid FROM users JOIN follows
ON users.id = follows.follow ORDER BY Fid DESC;