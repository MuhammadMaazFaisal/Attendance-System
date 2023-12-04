<?php
// Fetch the website content
$ch = curl_init("https://zarea.pk/cement-price-in-pakistan/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Parse the HTML and extract data
$dom = new DOMDocument();
libxml_use_internal_errors(true); // To suppress warnings from invalid HTML
$dom->loadHTML($html);
libxml_clear_errors();

// Find the first row of the table and extract data
$data = [];
$tableRows = $dom->getElementsByTagName('tr');
if ($tableRows->length > 2) { // Check if there's at least one row
    $firstRow = $tableRows->item(2); // Assuming the first row is headers
    $cells = $firstRow->getElementsByTagName('td');
    $data = [
        'brand' => $cells->item(1)->textContent,
        'date' => $cells->item(2)->textContent,
        'unit' => $cells->item(3)->textContent,
        'price' => $cells->item(4)->textContent
    ];
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>