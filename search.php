<?php
// search.php - Processes the search and returns results

// Sample data set for web and app development tools and resources
$data = [
    ['name' => 'React', 'category' => 'frontend'],
    ['name' => 'Angular', 'category' => 'frontend'],
    ['name' => 'Vue.js', 'category' => 'frontend'],
    ['name' => 'Node.js', 'category' => 'backend'],
    ['name' => 'Django', 'category' => 'backend'],
    ['name' => 'Laravel', 'category' => 'backend'],
    ['name' => 'MongoDB', 'category' => 'database'],
    ['name' => 'MySQL', 'category' => 'database'],
    ['name' => 'PostgreSQL', 'category' => 'database'],
    ['name' => 'Flutter', 'category' => 'mobile'],
    ['name' => 'React Native', 'category' => 'mobile'],
    ['name' => 'Xamarin', 'category' => 'mobile'],
    ['name' => 'Visual Studio Code', 'category' => 'tools'],
    ['name' => 'GitHub', 'category' => 'tools'],
    ['name' => 'JIRA', 'category' => 'tools'],
    ['name' => 'Python', 'category' => 'backend'],
    ['name' => 'JavaScript', 'category' => 'frontend'],
    ['name' => 'Swift', 'category' => 'mobile'],
    ['name' => 'PHP', 'category' => 'backend'],
    ['name' => 'HTML & CSS', 'category' => 'frontend'],
];

// Get search criteria from the form submission
$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';
$sortBy = $_POST['sortBy'] ?? 'relevance';

// Filter data based on search criteria
$filteredData = array_filter($data, function ($item) use ($keyword, $category) {
    $matchesKeyword = empty($keyword) || stripos($item['name'], $keyword) !== false;
    $matchesCategory = empty($category) || $item['category'] === $category;
    return $matchesKeyword && $matchesCategory;
});

// Sort data based on selected sorting option
usort($filteredData, function ($a, $b) use ($sortBy) {
    switch ($sortBy) {
        case 'alphabetical':
            return strcmp($a['name'], $b['name']);
        default:
            return 0; // Keep the original order for relevance
    }
});

if (count($filteredData) > 0) {
    echo '<ul>';
    foreach ($filteredData as $item) {
        echo '<li>' . htmlspecialchars($item['name']) . ' - ' . ucfirst($item['category']) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No results found.</p>';
}
?>
