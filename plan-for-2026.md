# Plan for LTS 2026

Bas: `3.2.2`. Nuvarande LTS-head: `6084772`. Ny upstream-bas: `4.0.12`.

## Slutsats

Upstream `4.0.12` täcker flera LTS-fixar för filuppladdning och kryptering, men
saknar LTS-fixens CSP-vänliga scriptattribut i formulärvyn.

## Arbetsplan

- [ ] Starta från upstream `4.0.12`.
- [ ] Återskapa Composer- och installer-metadata.
- [ ] Behåll upstreams `Submission.php`-lösningar för upload/encryption.
- [ ] Lägg tillbaka CSP-vänliga scriptattribut i nya formpartialen.
- [ ] Verifiera formulärpostning, upload, krypterad downloadlänk och spamfält.

## Beslutstabell

| Område | Vår slutändring | Upstream-läge | Bedömning | Berörda commits |
| --- | --- | --- | --- | --- |
| Composer och paketering | Bytte till `municipio/wp-plugin-modularity-form-builder`, GPL och installer-konfiguration. | Upstream är kvar på `helsingborg-stad/modularity-form-builder`, MIT och nya servicekrav. | Återskapa smalare | package-/basecommits |
| Filuppladdning och kryptering | Sanerade fältnycklar och skyddade mot saknad `ENCRYPT_METHOD`. | Upstream innehåller motsvarande eller robustare logik i `Submission.php`. | Ersätt | `87c5952`, `aeaf1ef`, `6c820c1` |
| CSP för inline script | Använde `wp_sanitize_script_attributes(apply_filters('wp_inline_script_attributes', []))`. | `4.0.12` har kvar `<script type="text/javascript">` i formulärpartialen. | Behåll | `ba17eb0` |
| Card context | Lade till `module.form`-context. | Upstream har delat upp `form-card` och `form-container`. | Ersätt, verifiera styling | `94976ea` |
| Assets, språk och releasefiler | LTS-specifika bygg- och metadataändringar. | Ska hanteras av upstream och lokala byggsteg. | Ej relevant | docs-/assetcommits |

## Risker att verifiera

- Gammalt krypterat submission-innehåll kan påverkas av upstreams nya
  decrypt-logik.
- CSP-attribut behöver testas med den faktiska policy som används i LTS.
- Nya eller ändrade translatable strings kräver manuell språkfilsuppdatering
  vid implementation.

## Analyskommandon

- `git diff --stat 3.2.2..HEAD`
- `git diff --stat 3.2.2..4.0.12`
- `git diff --stat HEAD..4.0.12`
- `git log --reverse --format='%h%x09%ad%x09%s' --date=short 3.2.2..HEAD`
- `git log --reverse --format='%h%x09%ad%x09%s' --date=short 3.2.2..4.0.12`
- Riktade `git diff`, `git show` och `git grep` för Composer,
  `Submission.php` och formvyerna.
