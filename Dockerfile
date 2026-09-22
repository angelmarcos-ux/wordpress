FROM wordpress:latest

RUN apt-get update && apt-get install -y --no-install-recommends \
    vim \
    iputils-ping \
    net-tools \
    && rm -rf /var/lib/apt/lists/*