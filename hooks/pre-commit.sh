#!/usr/bin/env bash

# Run all automated tests on commit.
function test_on_commit() {
  bin/test --no-fix || exit 1;
  exit 0;
}

test_on_commit;
