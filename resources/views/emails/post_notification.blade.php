<!DOCTYPE html>
<html>
<head>
    <title>Post Notification</title>
</head>
<body>
    <p>Hello,</p>
    <p>A new post has been published on our website.</p>
    
    <h2>{{ $post->title }}</h2>
    
    <p>{{ $post->description }}</p>
    
    <p>Thank you for subscribing to our website!</p>
</body>
</html>
