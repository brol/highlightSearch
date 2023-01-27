Astuce :

Pour afficher les résumés d'articles ET le contenu dans le résultat de recherche, faites la manipulation suivante.

Dans votre thème, remplacer dans le fichier "search.html" :
```html
<!-- # Entry without excerpt -->
<tpl:EntryIf extended="0">
<div class="post-content">{{tpl:EntryContent}}</div>
</tpl:EntryIf>
```
par
```html
<!-- # Entry content -->
<div class="post-content">{{tpl:EntryContent}}</div>
```

