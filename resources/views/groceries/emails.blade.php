@yield("email-content")
<!DOCTYPE html>
<html>
<head>
    <title>Comment Posted</title>
</head>
<body>
    <h1>A new comment has been posted</h1>
    <p>{{ $comment->content }}</p>
    <p>Posted by: {{ $comment->email }}</p>
</body>
</html>
