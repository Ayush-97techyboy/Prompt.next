# New test

## Preconditions
- Describe what must already be true (app open, user logged out, …)

## Steps
1. Describe each action the agent should take, paired with what to expect.
2. If the test needs credentials, reference them — e.g. "Read the QA
   credentials from secrets/credentials.txt" — never write them here.
3. Reusable sequences live in procedures/ — call them like
   `login_to_ui[username, password]`.

## Postconditions
- Describe what success looks like at the end.

<!-- Cross-platform? Add a first line like:  platforms: desktop, android
     Then the test runs (only) on a Cross-platform profile. -->
