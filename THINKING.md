# Overview
### API
Initially thought no tokens, but actually it would be good to show the considerations and middleware here.

So let's add some API tokens, but we'll simply seed some valid tokens for now.

**Versioning**
Could add some versioning to the API, but for something so straightforward I don't think it's necessary. It's only useful here to _show_ that we can do it.

**Reusing nanoids**
If two people request the same URL to be shortened, we'll generate a new nanoid for the second request and we won't reuse the initial one.

In practice we could reuse the nanoid if we wanted to, but in an actual product we'd have 'hit' tracking against each Url/nanoid and we'd need them to be unique.

**URL Validation?**
I did consider adding a rule to check the URL was resolvable and reachable, but decided against it to support local development.

Maybe it would be useful for a public URL to redirect to a local one. If I'm helping a family member get to their router's admin page for example.

Then I could redirect https://lech.ing/f6ax1mz to http://192.168.1.1/

There's a gut feeling that this could be used for abuse in some way, but I've not investigated that yet.

**Exceptions/Attempts**
Not a fan of too many custom exceptions. It makes the code messy.

I'd rather increment an error count stat in a statsd server or similar, then simply return null.

**DecodeRequest/EncodeRequest**
They're the same right now, they could be merged, but maybe in future we'll want to add different validation rules for each.

### Web

https://lech.test is a super basic Livewire frontend to generate short URLs.

### Console
Added a console command to shorten a URL.

```bash
./artisan app:shorten https://www.google.com
```
