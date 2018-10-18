<head>
    {% if titulo is defined%}
        <title>{{ titulo }}</title>
    {%else%}
        <title> Encomenda Expresso 2.0 </title> 
    {% endif%}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#009de0">
    <meta name="description" content="{{metaDesc}}">
    <meta property="og:image" content="{{thumbnail}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'/>
    <link rel="icon" href="/img/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="/favicon.ico" />
</head>