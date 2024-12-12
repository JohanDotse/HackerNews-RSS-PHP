<?php
function generateAlias($title)
    {
    $alias = strtolower($title);
    $alias = preg_replace('/[^a-z0-9\s-]/', '', $alias);
    $alias = preg_replace('/\s+/', '-', trim($alias));

    return $alias;
}

$rss = simplexml_load_file('https://hnrss.org/newest?points=500&comments=10');
$datetoday = date('ymd');

foreach ($rss->channel->item as $item)
    {
    $pubDate = strtotime($item->pubDate);
    $formattedDate = date('d M, H:i', $pubDate);
    $alias = generateAlias($item->title);

        echo '<pre>';
        echo htmlspecialchars($item->title) . "<br>";
        echo $datetoday . '-' . $alias . "<br>";
        echo htmlspecialchars($item->link) . "<br>";
        echo htmlspecialchars($item->comments) . "<br>";
        echo $formattedDate;
        echo '</pre>';
    }
?>
