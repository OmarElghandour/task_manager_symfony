<h2>Prerequisites</h2>

<p>Make sure you have the following installed on your machine:</p>

<ul>
    <li>Docker</li>
    <li>Docker Compose</li>
</ul>

<h2>Getting Started</h2>

<p>To get started with the Task Manager project, follow the instructions below:</p>

<ol>
    <li>Clone the repository to your local machine:</li>
</ol>

<pre><code>git clone &lt;repository_url&gt;</code></pre>

<ol start="2">
    <li>Navigate to the project directory:</li>
</ol>

<pre><code>cd task-manager-project</code></pre>

<ol start="3">
    <li>Build the Docker containers:</li>
</ol>

<pre><code>docker-compose build</code></pre>

<ol start="4">
    <li>Start the Docker containers:</li>
</ol>

<pre><code>docker-compose up -d</code></pre>

<ol start="5">
    <li>Install dependencies:</li>
</ol>

<pre><code>docker-compose exec app composer install</code></pre>

<ol start="6">
    <li>Generate the Symfony secret key:</li>
</ol>

<pre><code>docker-compose exec app php bin/console secrets:set</code></pre>

<p>You will be prompted to provide a value for the secret key. You can generate one using the following command:</p>

<pre><code>docker-compose exec app php bin/console secret:generate</code></pre>

<ol start="7">
    <li>Create the database:</li>
</ol>

<pre><code>docker-compose exec app php bin/console doctrine:database:create</code></pre>

<ol start="8">
    <li>Run the database migrations:</li>
</ol>

<pre><code>docker-compose exec app php bin/console doctrine:migrations:migrate</code></pre>

<ol start="9">
    <li>Access the application in your browser:</li>
</ol>

<p><a href="http://localhost:8000">http://localhost:8000</a></p>

<h2>Usage</h2>

<p>Once the Task Manager project is set up and running, you can perform the following actions:</p>

<ul>
    <li><strong>Create a task:</strong> Click on the "Add Task" button and fill in the required details.</li>
    <li><strong>Update a task:</strong> Click on the "Edit" button next to a task and modify the details.</li>
    <li><strong>Delete a task:</strong> Click on the "Delete" button next to a task to remove it from the list.</li>
</ul>

<h2>Configuration</h2>

<p>The project uses environment variables for configuration. These variables are defined in the <code>.env</code> file located in the project root directory. You can modify these variables according to your requirements.</p>

<p>Below are the important configuration variables:</p>

<ul>
    <li><code>DATABASE_URL:</code> Specifies the connection URL for the PostgreSQL database.</li>
    <li><code>APP
</ul>
