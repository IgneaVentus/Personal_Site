            <main>
                <?php
                    $data = JSON_decode(file_get_contents("./data/portfolio.json"), false);
                    $data = $data->projects;
            
                    $template = "
                        <section class='portfolio-item'>
                            <header><a href='%s'>%s</a></header>
                            <small>%s</small>
                            <details>
                                <summary>%s</summary>
                                <p>%s</p>
                            </details>
                        </section>
                    ";
                    foreach ($data as $item) {
                        $tools = "";
                        foreach($item->tools as $tool) {
                            $tools .= $tool.", ";
                        }
                        echo sprintf($template, $item->link, $item->name, $tools, $item->description[0], $item->description[1]);
                    }
                ?>
            </main>