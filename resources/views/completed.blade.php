<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @forelse ($users as  $user)
            
        <h1>username {{$user->name}}</h1>
        <p>projects count {{$user->projects->count()}}</p>
        @if ($user->projects->count()>0)
        @forelse ($user->projects as $project )
            
            <p>project name {{$project->name}}</p>
            <p>status {{$project->status}}</p>
            @empty
                
            @endforelse
            
        @endif
    
        @empty
            
        @endforelse
    </div>
</body>
</html>