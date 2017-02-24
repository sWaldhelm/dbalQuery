  private function getArticleAttributes($articleID)
    {
        $connection = $this->container->get('dbal_connection');

        $builder = $connection->createQueryBuilder();
        $builder->select('saa.ggo_preview_motive', 'saa.ggo_preview_textfield', 'sad.id')
            ->from('s_articles_details', 'sad')
            ->innerJoin('sad',
            's_articles',
            'sa',
            'sa.id = sad.articleID'
            )
            ->innerJoin(
                'sad',
                's_articles_attributes',
                'saa',
                'saa.articledetailsID = sad.id'
                )
            ->where('sa.id ="'.$articleID.'"');

        $stmt = $builder->execute();
        $result = $stmt->fetchAll();
        return $result;
    }