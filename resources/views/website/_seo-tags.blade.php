<title>@yield('title', 'Ricoma')</title>
<meta name="description"
    content="@yield('meta-description', 'Welcome to Ricoma')">
<meta name="keywords" content="Embroidery,Embroidery Machines @yield('seo-keywords')">

<!-- Google / Search Engine Tags -->
<meta itemprop="image" content="@yield('image')">

<!-- Facebook OpenGraph Tags -->
<meta property="og:title" content="@yield('og-title', 'Ricoma')" />
<meta property="og:type" content="@yield('og-type', 'website')" />
<meta property="og:url" content="@yield('og-url', Request::fullUrl())" />
<meta property="og:image" content="@yield('og-image')" />
<meta property="og:description" content="@yield('og-description', 'Welcome to Ricoma')" />