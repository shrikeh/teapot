#!/usr/bin/env bash

# Run all automated tests on commit.
function test_on_commit() {
  composer analyze || exit 1;
  composer cs-check || exit 1;
  composer test || exit 1;
  exit 0;
}

test_on_commit;
