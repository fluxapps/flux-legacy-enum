ARG ALPINE_IMAGE=alpine:latest
ARG AUTOLOAD_API_IMAGE=docker-registry.fluxpublisher.ch/flux-autoload/api:latest

FROM $AUTOLOAD_API_IMAGE AS autoload_api

FROM $ALPINE_IMAGE AS build

COPY --from=autoload_api /flux-autoload-api /flux-legacy-enum/libs/flux-autoload-api
COPY . /flux-legacy-enum

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/fluxapps/flux-legacy-enum"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"

COPY --from=build /flux-legacy-enum /flux-legacy-enum
